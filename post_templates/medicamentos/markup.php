<?php global $post, $med_info;?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "MedicalWebPage",
    "about": {
        "@type": "MedicalCondition",
        "name": [ "<?php echo str_replace(",", '","', $med_info["c"]); ?>"
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
            "image": "<?php echo $med_info["i"];?>"
        }]
    },
    "datePublished": "<?php echo $med_info["pd"]; ?>",
    "name": "<?php echo $post->post_title; ?>",
    "headline": "<?php echo $post->post_title; ?> | Para qué sirve | Dosis | Formula y Genérico",
    "primaryImageOfPage": "<?php echo $med_info["i"];?>",
    <?php
    if (count($med_info["md"]) > 0): ?>
        "author" : {
            "@type": "Person",
            "name": "<?php echo $med_info["md"][0]["post_title"]; ?>",
            "jobTitle": "Medical Doctor",
            "mainEntityOfPage": "<?php echo get_permalink($med_info["md"][0]["ID"]); ?>",
            "image": "<?php echo get_the_post_thumbnail_url($med_info["md"][0]["ID"]);?>"
        },
    <?php endif; ?>
}
</script>