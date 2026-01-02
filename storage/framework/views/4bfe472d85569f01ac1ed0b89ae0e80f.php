<?php $__env->startSection('content'); ?>
<?php echo $__env->make('components.navbar-user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(session('first_login')): ?>
<div class="overlay" id="motivationOverlay"></div>
<div class="motivation-popup" id="motivationPopup">
    <div class="text-center">
        <i class="bi bi-trophy display-1 text-warning"></i>
        <h3 class="mt-3">Selamat Datang, <?php echo e(Auth::user()->nickname); ?>! 🎉</h3>
        <p class="lead">
            Target kamu: Turun
            <strong><?php echo e(number_format(Auth::user()->weight_difference, 1)); ?> kg</strong>
        </p>
        <p>"Perjalanan 1000 mil dimulai dengan satu langkah. Kamu sudah memulainya!"</p>
        <button class="btn btn-primary mt-3" onclick="closeMotivationPopup()">Mulai Perjalanan Diet</button>
    </div>
</div>
<?php endif; ?>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Left Column - Recipes -->
        <div class="col-lg-8">
            <h3>Menu Diet untuk Anda</h3>
            <div class="row">
                <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($recipe->title); ?></h5>
                            <p class="card-text"><i class="bi bi-fire"></i> <?php echo e($recipe->calories); ?> Kalori</p>
                            <button class="btn btn-primary view-recipe-detail"
                                    data-id="<?php echo e($recipe->id); ?>"
                                    data-title="<?php echo e($recipe->title); ?>"
                                    data-calories="<?php echo e($recipe->calories); ?>"
                                    data-description="<?php echo e($recipe->description); ?>"
                                    data-ingredients="<?php echo e($recipe->ingredients); ?>"
                                    data-instructions="<?php echo e($recipe->instructions); ?>">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                </ul>
            </nav>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <!-- Daily Personalized Menu (Premium Feature) -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Daily Personalized Menu</h5>
                    <div class="text-center py-4">
                        <i class="bi bi-lock display-4 text-muted"></i>
                        <p class="mt-3">Upgrade ke premium untuk mendapatkan menu personal harian!</p>
                        <a href="<?php echo e(route('subscription.plans')); ?>" class="btn btn-warning">
                            Upgrade Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Articles -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Artikel Terbaru</h5>
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="<?php echo e($blog['url']); ?>" class="text-decoration-none">
                                <h6><?php echo e($blog['title']); ?></h6>
                                <small class="text-muted"><?php echo e($blog['date']); ?></small>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <!-- BMI Calculator -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Kalkulator BMI</h5>
                    <?php echo $__env->make('components.bmi-calculator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Recipe Detail Modal -->
<div class="modal fade" id="recipeDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><i class="bi bi-fire"></i> <span id="modalCalories"></span> Kalori</p>
                <h6>Deskripsi:</h6>
                <p id="modalDescription"></p>
                <h6>Bahan-bahan:</h6>
                <p id="modalIngredients"></p>
                <h6>Cara Membuat:</h6>
                <p id="modalInstructions"></p>
            </div>
        </div>
    </div>
</div>

<script>
    function closeMotivationPopup() {
        document.getElementById('motivationPopup').style.display = 'none';
        document.getElementById('motivationOverlay').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const recipeButtons = document.querySelectorAll('.view-recipe-detail');
        const modal = new bootstrap.Modal(document.getElementById('recipeDetailModal'));

        recipeButtons.forEach(button => {
            button.addEventListener('click', function() {
                document.querySelector('#recipeDetailModal .modal-title').textContent = this.dataset.title;
                document.getElementById('modalCalories').textContent = this.dataset.calories;
                document.getElementById('modalDescription').textContent = this.dataset.description;
                document.getElementById('modalIngredients').textContent = this.dataset.ingredients;
                document.getElementById('modalInstructions').textContent = this.dataset.instructions;

                modal.show();
            });
        });

        // Auto show motivation popup on first login
        <?php if(session('first_login')): ?>
        setTimeout(() => {
            document.getElementById('motivationPopup').style.display = 'block';
            document.getElementById('motivationOverlay').style.display = 'block';
        }, 1000);
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Achmad\Documents\eatjoy-cc\project-eatjoy\resources\views/dashboard/user.blade.php ENDPATH**/ ?>