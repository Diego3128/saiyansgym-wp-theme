<?php
/*
 * Template name: Image Gallery
 * Template post type: page
*/
if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 font-main overflow-auto">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Header Title -->
        <header class="text-center mb-10">
            <h1 class="font-title text-4xl sm:text-5xl lg:text-6xl text-main tracking-wide uppercase mb-4">
                <?php the_title(); ?>
            </h1>
            <p class="text-gray-600 max-w-xl mx-auto text-base sm:text-lg">
                Explore our state-of-the-art gym facilities, equipment, and training sessions.
            </p>
        </header>

        <div class="gallery-wrapper">
            <?php
            $post_id = get_the_ID();
            $gallery = get_post_gallery($post_id, false);
            $imgIdList = isset($gallery['ids']) ? explode(',', $gallery['ids']) : [];

            if (count($imgIdList) > 0) : ?>
                
                <!-- Responsive Image Grid -->
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php
                    foreach ($imgIdList as $id) :
                        $largeImg = wp_get_attachment_image_src($id, 'large');
                        $fullImg  = wp_get_attachment_image_src($id, 'full');
                        $altText  = get_post_meta($id, '_wp_attachment_image_alt', true) ?: 'Gallery image';
                        $largeUrl = $largeImg[0] ?? '';
                        $fullUrl  = $fullImg[0] ?? '';
                    ?>
                        <li class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-gray-100 shadow-sm transition-all duration-300 hover:shadow-lg hover:border-main/50 hover:-translate-y-1">
                            <button type="button" 
                                    class="gallery-trigger block w-full h-64 overflow-hidden focus:outline-none cursor-pointer" 
                                    data-full="<?= esc_url($fullUrl); ?>" 
                                    data-alt="<?= esc_attr($altText); ?>">
                                
                                <img src="<?= esc_url($largeUrl); ?>" 
                                     alt="<?= esc_attr($altText); ?>" 
                                     class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105">
                                
                                <!-- Hover Overlay Icon -->
                                <div class="absolute inset-0 bg-gray-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <div class="bg-main text-white p-3 rounded-full shadow-lg transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>

            <?php else : ?>
                <div class="text-center py-16 bg-gray-100 border border-gray-200 rounded-2xl">
                    <p class="text-gray-600 text-lg">No images in the gallery yet.</p>
                </div>
            <?php endif; ?>
        </div>

    <?php endwhile; ?>
</main>

<!-- Light Modal Popup -->
<div style="z-index: 10000;" id="image-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-200/60 backdrop-blur-sm p-4 transition-opacity duration-300">
    <div class="relative max-w-6xl w-full max-h-[90vh]  rounded-2xl overflow-hidden shadow-2xl flex flex-col items-center">
        
        <!-- Close Button -->
        <button id="modal-close" type="button" aria-label="Close modal" class="absolute top-4 right-4 z-10 size-10 bg-gray-100 hover:bg-main hover:text-white text-gray-700 p-2 rounded-full transition-colors shadow-md focus:outline-none opacity-50">
            X
        </button>

        <!-- Full Image Container -->
        <div class="w-full h-full flex items-center justify-center overflow-hidden">
            <img id="modal-img" src="" alt="" class="w-auto max-w-full object-contain rounded-lg">
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const triggers = document.querySelectorAll('.gallery-trigger');
    const modal = document.getElementById('image-modal');
    const modalImg = document.getElementById('modal-img');
    const closeBtn = document.getElementById('modal-close');

    if (!modal || !modalImg) return;

    // Open Modal Function
    const openModal = (fullUrl, altText) => {
        modalImg.src = fullUrl;
        modalImg.alt = altText || 'Gallery full image';
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden'); // Prevent background scrolling
    };

    // Close Modal Function
    const closeModal = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modalImg.src = '';
        document.body.classList.remove('overflow-hidden');
    };

    // Attach trigger event listeners
    triggers.forEach(button => {
        button.addEventListener('click', () => {
            const fullUrl = button.getAttribute('data-full');
            const altText = button.getAttribute('data-alt');
            if (fullUrl) openModal(fullUrl, altText);
        });
    });

    // Close on button click
    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    // Close on clicking overlay outside image
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close on ESC key press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
});
</script>

<?php
get_footer();
?>