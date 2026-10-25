<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<section>
    <?php
    $hover_hero_image = get_field("hover_hero_image");
    ?>
    <div
        class=" group h-[85vh] relative bg-black overflow-hidden">
        <img src="<?= $hover_hero_image; ?>" alt="hero image" class="absolute inset-0 w-full h-full object-cover lg:object-contain drop-shadow-2xl drop-shadow-main/50 group-hover:drop-shadow-main group-hover:scale-105 transition-all duration-700 ">

        ?>
        <h1 class="absolute top-[80%] left-[50%] translate-x-[-50%] translate-y-[-50%] bg-main text-white p-5 font-bold">
            <?php
            the_field("hero_heading");
            ?>
        </h1>

        <h2 class="bg-main text-white text-2xl p-3 font-bold absolute bottom-0 left-0 w-full text-center">
            <?php
            the_field("welcome_heading");
            ?>
        </h2>
    </div>

</section>

<section>
    <div class="p-5">
        <p class="mx-auto max-w-2xl text-xl font-sans font-black text-pretty text-center border border-gray-200 p-3 text-gray-500 my-10">
            <?php
            the_field("welcome_paragraph");
            ?>
        </p>
    </div>
    <!-- areas -->
    <div id="areas" class="flex flex-wrap max-w-6xl mx-auto">
        <?php
        $num_areas = 4;
        // if(isset(the_field("displayed_areas"))){
        $displayed_areas =   get_field("displayed_areas");
        if ($displayed_areas) {
            $num_areas = $displayed_areas;
        }

        // $num_areas = get_field("displayed_areas");
        // }
        for ($i = 1; $i <= $num_areas; $i++) :
            $img_large = get_field("area_{$i}")["image"]["sizes"]["large"] ?? [];
            $img_title = get_field("area_{$i}")["image"]["title"] ?? "Area image";
            $area_title = get_field("area_{$i}")["title"] ?? "";
            // echo "<pre>";
            // var_dump($img_large);
            // var_dump($area_title);
            // echo "</pre>";
            if (empty($img_large) || empty($area_title)) continue;
            // render areas 
        ?>
            <div class="area relative w-full sm:w-1/2  aspect-4/3 overflow-hidden  ">
                <img class="absolute inset-0 w-full h-full object-cover" src="<?= esc_attr($img_large) ?>" alt="<?= esc_attr($img_title) ?>">
                <div class="text absolute z-20 inset-0 flex items-center justify-center transition-all duration-200">
                    <h3 class="text-center w-full text-white capitalize text-xl font-black tracking-widest md:tracking-[15px] md:text-2xl scale-100 text-shadow-lg text-shadow-main  "><?= esc_html($area_title) ?> </h3>
                </div>
            </div>

        <?php
        endfor;
        ?>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", async () => {
            const sleep = (ms) => new Promise((resolve) => setTimeout(resolve, ms));
            const areas = document.querySelectorAll("#areas .area");
            if (areas.length === 0) return;

            let currentIndex = 0;

            while (true) {
                const img = areas[currentIndex];
                const text = img.querySelector(".text");

                if (text) {
                    // Wait 3 seconds before switching/applying
                    await sleep(3000);

                    // Remove blur from ALL areas first
                    areas.forEach((area) => {
                        const aText = area.querySelector(".text");
                        if (aText) {
                            aText.classList.remove("backdrop-blur-[2px]", "scale-110");
                        }
                    });

                    // Apply blur to the current one
                    text.classList.add("backdrop-blur-[2px]", "scale-110");
                }

                // Move to the next index, and loop back to 0 if we reach the end
                currentIndex = (currentIndex + 1) % areas.length;
            }
        });
    </script>

</section>

<main class="max-w-6xl mx-auto py-20 px-3 lg:px-0">
    <!-- class list -->
    <?php
    $section_title = get_field("section_title") ?? "Latest Classes";
    $number_of_classes = abs(intval(get_field("number_of_classes"))) ?? 3;
    $class_page_id = abs(intval(get_field("class_page_id"))) ?? 0;

    ?>
    <h2 class="bg-main text-white text-2xl p-3 font-bold  text-center mb-16"><?= esc_html($section_title)?></h2>
    <?php get_formatted_class_list($number_of_classes) ?>
    <?php
    if ($class_page_id):
        $permalink = get_permalink($class_page_id);
        if ($permalink): ?>
            <a class="inline-block my-4 bg-main p-3 text-white font-bold rounded-lg" href="<?= esc_url($permalink) ?>">More Classes</a>
    <?php
        endif;
    endif;

    ?>
</main>


<?php
get_footer();
?>