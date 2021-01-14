<?php global $post;?>

<script type="application/ld+json">
{
    "@context": "http://schema.org/",
    "@type": "Product",
    "name": "<?php echo $post->post_title; ?>",
    "image": "<?php echo get_the_post_thumbnail_url();?>",
    "description": "<?php echo $post->post_title; ?>"
}
</script>