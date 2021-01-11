<?php global $post;?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "member": [
    {
      "@type": "Organization"
    }
  ],
  "name": "<?php echo $post->post_title;?>",
  "telephone": "<?php echo get_post_meta($post->ID, 'farma_tel', true);?>",
  "sameAs" : "<?php echo get_post_meta($post->ID, 'farma_web', true);?>"
}
</script>