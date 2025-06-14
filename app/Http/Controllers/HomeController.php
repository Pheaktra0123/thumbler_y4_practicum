<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\ModelTumbler;
use App\Models\Tumbler;
use App\Models\CustomizedTumbler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'Categories', 'model', 'search', 'filterByCategory', 'filterByModel', 'filterInCategory', 'filterTrandingTumblers');
    }

    public function index()
    {
        $user = Auth::user();
        $reviews = Review::all();
        if ($user) {
            // Fetch tumblers with reviews for the authenticated user
            $tumblers = Tumbler::with(['reviews', 'category', 'model'])
                ->whereHas('reviews', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->paginate(4);

            foreach ($tumblers as $tumbler) {
                $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
                $tumbler->rating_count = $tumbler->reviews->count();
            }
        } else {
            // If no user is authenticated, fetch all tumblers without reviews
            $tumblers = Tumbler::with(['category', 'model'])->paginate(4);
        }

        return view('Pages.home', compact('user', 'reviews'));
    }
    public function dashboard()
    {
        return view('User/user_dashboard');
    }
    public function userEdit()
    {
        return view('User/Profile_Edit');
    }

    public function adminHome()
    {
        $users = User::paginate(5); // Get all users and paginate
        $tumblers = Tumbler::get();
        $orders = Order::all(); // Get all orders
        $orderCount = $orders->count();     // Count orders

        $monthlyOrders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        // Fill in missing months with 0
        $chartData = [];
        $labels = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = date('M', mktime(0, 0, 0, $i, 1));
            $labels[] = $monthName;
            $chartData[] = $monthlyOrders[$i] ?? 0;
        }
        $statusCounts = Order::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        return view('Admin/Dashboard', compact('users', 'tumblers', 'orderCount', 'chartData', 'labels','statusCounts'));
    }
    public function Categories()
    {
        try {
            $Categories = Categories::all(); // Get all categories
            $ModelTumbler = ModelTumbler::all();
            // Eager load reviews to avoid N+1 queries
            $tumblers = Tumbler::with(['reviews', 'category', 'model'])->paginate(4);

            foreach ($tumblers as $tumbler) {
                $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
                $tumbler->rating_count = $tumbler->reviews->count();
            }

            return view('Pages.Home_Category', compact('Categories', 'ModelTumbler', 'tumblers'));
        } catch (\Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return view('Pages.Home_Category', [
                'Categories' => collect([]),
                'ModelTumbler' => collect([]),
                'tumblers' => collect([])
            ]);
        }
    }
    public function model()
    {
        $model = ModelTumbler::all();
        return view('Pages.Home_Model_Tumbler', compact('model'));
    }


    //search function to search tumbler in catetory and model
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search tumblers
        $tumblers = Tumbler::with(['category', 'model'])
            ->where('tumbler_name', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('model', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->paginate(4); // Paginate the results
        // Eager load reviews to avoid N+1 queries
        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }
        $Categories = Categories::paginate(6);

        return view('Pages.Home_Category', compact('tumblers', 'Categories', 'query'));
    }
    public function filterByCategory($categoryId)
    {
        $tumblers = Tumbler::where('category_id', $categoryId)->paginate(4);
        $Categories = Categories::all();
        $ModelTumbler = ModelTumbler::all();
        // Eager load reviews to avoid N+1 queries
        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }
        // Return the view with the tumblers, categories, and model tumbler data
        if ($tumblers->isEmpty()) {
            return redirect()->back()->with('error', 'No tumblers found for this category.');
        }
        // Return the view with the filtered tumblers

        return view('Pages.category', compact('tumblers', 'Categories', 'ModelTumbler'));
    }
    // Filter tumblers by model
    public function filterByModel($modelId)
    {
        $query = request()->input('query');
        $tumblers = Tumbler::where('model_id', $modelId)
            ->when($query, function ($q) use ($query) {
                $q->where('tumbler_name', 'LIKE', "%{$query}%");
            })
            ->with(['reviews', 'category', 'model'])
            ->paginate(8);

        // ... set rating/rating_count if needed ...

        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }
        $model = ModelTumbler::findOrFail($modelId);
        return view('Pages.model', compact('tumblers', 'model'));
    }
    // Filter tumblers in a specific category with search functionality
    public function filterInCategory($categoryId)
    {
        $query = request()->input('query');
        $tumblers = Tumbler::where('category_id', $categoryId)
            ->when($query, function ($q) use ($query) {
                $q->where('tumbler_name', 'LIKE', "%{$query}%");
            })
            ->with(['reviews', 'category', 'model'])
            ->paginate(8);

        // ... set rating/rating_count if needed ...

        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }
        $category = ModelTumbler::findOrFail($categoryId);
        return view('Pages.category', compact('tumblers', 'category', 'query'));
    }
    // Display tumblers on the home page with categories
    public function homeCategory()
    {
        $Categories = Categories::all();
        // Eager load reviews to avoid N+1 queries
        $tumblers = Tumbler::with('reviews', 'category', 'model')->paginate(8);

        foreach ($tumblers as $tumbler) {
            $tumbler->rating = round($tumbler->reviews->avg('rating'), 1) ?? 0;
            $tumbler->rating_count = $tumbler->reviews->count();
        }

        return view('Pages.Home_Category', compact('Categories', 'tumblers'));
    }
    // Search for models in the tumbler model page
    public function searchModel(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $model = ModelTumbler::where('name', 'LIKE', "%{$query}%")->paginate(4);
        } else {
            $model = ModelTumbler::paginate(4);
        }
        return view('Pages.Home_Model_Tumbler', compact('model', 'query'));
    }
    public function customizeTumbler($id)
    {
        $tumbler = \App\Models\Tumbler::findOrFail($id);
        return view('Pages.customize_tumbler', compact('tumbler'));
    }

    public function saveCustomizedTumbler(Request $request, $id)
    {
        $request->validate([
            'engraving' => 'nullable|string|max:6',
            'font' => 'nullable|string',
            'color' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image|max:1024', // 1MB max
        ]);

        $tumbler = \App\Models\Tumbler::findOrFail($id);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('custom_tumblers', 'public');
        }

        // Save to customized_tumblers table
        $custom = new \App\Models\CustomizedTumbler();
        $custom->user_id = auth()->id();
        $custom->tumbler_id = $tumbler->id;
        $custom->engraving = $request->engraving;
        $custom->font = $request->font;
        $custom->color = $request->color;
        $custom->quantity = $request->quantity;
        $custom->image = $imagePath;
        $custom->save();

        return redirect()->route('customized.tumblers')->with('success', 'Customization saved!');
    }
    public function customizedTumblers()
    {
        $customized = CustomizedTumbler::where('user_id', auth()->id())->get();
        return view('Pages.customized_tumblers', compact('customized'));
    }
    public function deleteCustomizedTumbler($id)
    {
        $custom = CustomizedTumbler::where('user_id', auth()->id())
            ->where('id', $id)
            ->first();

        if ($custom) {
            $custom->delete();
        }

        return redirect()->route('customized.tumblers')->with('success', 'Customization deleted!');
    }
    public function customizedTumblerDetails($id)
    {
        $custom = \App\Models\CustomizedTumbler::where('user_id', auth()->id())
            ->where('id', $id)
            ->first();

        if (!$custom) {
            return redirect()->route('customized.tumblers')->with('error', 'Customization not found.');
        }

        $tumbler = \App\Models\Tumbler::find($custom->tumbler_id);

        return view('Pages.customized_detail', compact('custom', 'tumbler'));
    }
    //Filter trending tumblers base on sales or reviews 
    public function filterTrandingTumblers()
    {
        $trendingTumblers = Tumbler::with(['category', 'model'])
            ->select(
                'tumblers.id',
                'tumblers.tumbler_name',
                'tumblers.price',
                'tumblers.sizes',
                'tumblers.stock',
                'tumblers.thumbnails',
                'tumblers.category_id',
                'tumblers.model_id',
                DB::raw('COUNT(DISTINCT order_items.id) as orders_count'),
                DB::raw('COUNT(DISTINCT reviews.id) as reviews_count')
            )
            ->leftJoin('order_items', function ($join) {
                $join->on('tumblers.id', '=', 'order_items.tumbler_id')
                    ->where('order_items.created_at', '>=', now()->subMonth());
            })
            ->leftJoin('reviews', 'tumblers.id', '=', 'reviews.tumbler_id')
            ->groupBy(
                'tumblers.id',
                'tumblers.tumbler_name',
                'tumblers.price',
                'tumblers.sizes',
                'tumblers.stock',
                'tumblers.thumbnails',
                'tumblers.category_id',
                'tumblers.model_id'
            )
            ->havingRaw('COUNT(DISTINCT order_items.id) >= 3')
            ->orderByDesc('orders_count')
            ->paginate(8);

        // Optionally, calculate rating/rating_count here if needed

        return view('Pages.Home_Trending_Tumbler', compact('trendingTumblers'));
    }
}
