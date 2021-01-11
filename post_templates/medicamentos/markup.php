<?php global $post;?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "MedicalWebPage",
    "about": {
        "@type": "MedicalCondition",
        "name": [ <?php echo $cat_str; ?>
        ]
    },
    "aspect": [
        "Treatment",
        "Dosis"
    ],
    "audience": {
        "@type": "http://schema.org/Patient",
        "drug": [{
            "@type": "Drug",
            "name": "<?php echo $post->post_title; ?>",
            "image": "<?php echo get_the_post_thumbnail_url();?>"
        }]
    },
    "datePublished": "<?php echo get_the_date(); ?>",
    "name": "<?php echo $post->post_title; ?>",
    "headline": "<?php echo $post->post_title; ?> | Para qué sirve | Dosis | Formula y Genérico",
    "primaryImageOfPage": "<?php echo get_the_post_thumbnail_url();?>",
    <?php
    if (count($med_posts) > 0): ?>
        "author" : {
            "@type": "Person",
            "name": "<?php echo get_post_meta( $med_posts[0]->ID, 'med_nombre', true ); ?>",
            "jobTitle": "Medical Doctor",
            "mainEntityOfPage": "<?php echo get_permalink($med_posts[0]->ID); ?>",
            "image": "<?php echo get_the_post_thumbnail_url();?>"
        },
    <?php endif; ?>
}
</script>