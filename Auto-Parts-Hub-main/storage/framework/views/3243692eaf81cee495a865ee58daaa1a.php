<?php $__env->startSection('content'); ?>

<div class="container mx-auto px-4 py-8">
    <!-- Popular Categories -->
    <h2 class="text-3xl font-bold text-center mb-8">Popular Categories</h2>
    <div class="flex overflow-x-auto pb-6 mb-12 gap-6 scrollbar-hide">
        <?php $__currentLoopData = $systemCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="category-card flex-none w-72">
            <h3 class="text-xl font-semibold mb-2"><?php echo e($category['name']); ?></h3>
            <p class="text-gray-600 mb-4"><?php echo e($category['description']); ?></p>
            <div class="h-48 rounded-lg overflow-hidden mb-4">
                <img src="<?php echo e(asset($category['image'])); ?>" alt="<?php echo e($category['name']); ?>" class="w-full h-full object-cover">
            </div>
            <a href="<?php echo e(route('shop.category', ['type' => $category['type'], 'slug' => $category['slug']])); ?>" 
               class="text-blue-600 hover:text-blue-800">Browse <?php echo e(strtolower($category['name'])); ?></a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Main Categories -->
    <h2 class="text-3xl font-bold text-center mb-8">Main Categories</h2>
    <div class="flex gap-8 mb-12">
        <!-- Motor Parts -->
        <div class="main-category-card relative overflow-hidden rounded-lg h-80 flex-1">
            <img src="<?php echo e(asset('images/categories/motor-parts-bg.jpg')); ?>" alt="Motor Parts" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-blue-900/50 flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-white mb-4">Motor<br>Parts</h2>
                    <a href="<?php echo e(route('shop.category', ['type' => 'motor', 'slug' => 'all'])); ?>" 
                       class="inline-block bg-white text-blue-900 px-6 py-2 rounded-full hover:bg-blue-100 transition">View All</a>
                </div>
            </div>
        </div>

        <!-- Vehicle Parts -->
        <div class="main-category-card relative overflow-hidden rounded-lg h-80 flex-1">
            <img src="<?php echo e(asset('images/categories/vehicle-parts-bg.jpg')); ?>" alt="Vehicle Parts" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-white mb-4">Vehicle<br>Parts</h2>
                    <a href="<?php echo e(route('shop.category', ['type' => 'vehicle', 'slug' => 'all'])); ?>" 
                       class="inline-block bg-white text-gray-900 px-6 py-2 rounded-full hover:bg-gray-100 transition">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.category-card {
    @apply bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition duration-300;
}

.main-category-card {
    @apply transform hover:scale-105 transition duration-300 cursor-pointer shadow-xl;
}

.main-category-card img {
    @apply transition duration-300;
}

.main-category-card:hover img {
    @apply scale-110;
}

/* Hide scrollbar for Chrome, Safari and Opera */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.scrollbar-hide {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
   $(function(){
    $("#pagesize").on("change",function(){
      $("#size").val($("#pagesize option:selected").val());
      $("#frmfilter").submit();
    });

    $("#orderby").on("change",function(){                    
    $("#order").val($("#orderby option:selected").val());
    $("#frmfilter").submit(); 
    });

    $("input[name='brands']").on("change",function(){
      var brands = "";
      $("input[name='brands']:checked").each(function(){
        if(brands == "")
      {
        brands += $(this).val();
      }
      else
      {
        brands  += "," + $(this).val();
      }
      });
      $("#hdnBrands").val(brands);
      $("#frmfilter").submit(); 
    });

    $("input[name='categories']").on("change",function(){
      var categories = "";
      $("input[name='categories']:checked").each(function(){
        if(categories == "")
      {
        categories += $(this).val();
      }
      else
      {
        categories  += "," + $(this).val();
      }
      });
      $("#hdnCategories").val(categories);
      $("#frmfilter").submit(); 
    });
     $("[name='price_range']").on("change",function(){
      var min = $(this).val().split(',')[0];
      var max = $(this).val().split(',')[1];
      $("#hdnMinPrice").val(min);
      $("#hdnMaxPrice").val(max);
      setTimeout(() => {
        $("#frmfilter").submit();
      }, 2000);
     })
   });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Auto-Parts-Hub-main\resources\views/shop.blade.php ENDPATH**/ ?>