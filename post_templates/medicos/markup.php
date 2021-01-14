   <?php global $med_info;?>

    <script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Person",
      "honorificPrefix": "<?php echo $med_info['mt'][0]['med_prefijo'][0]; ?>",
      "honorificSuffix": "<?php echo $med_info['mt'][0]['med_sufijo'][0]; ?>",
      <?php if($med_info['mt'][0]['med_visibilidad_online'][0] !== ""): ?>
      "mainEntityOfPage" : "<?php echo $med_info['mt'][0]['med_visibilidad_online'][0]; ?>",
      <?php endif; ?>
      <?php if($med_info['mt'][0]['med_premio'][0] !== ""): ?>
          "award" : "<?php echo $med_info['mt'][0]['med_premio'][0]; ?>",
      <?php endif; ?>
      "image" : "<?php echo $med_info['i']; ?>",
      "jobTitle" : "Medical Doctor",
      "sameAs": [
      <?php if($med_info['mt'][0]['med_google'][0] !== ""): ?>
          "<?php echo $med_info['mt'][0]['med_google'][0]; ?>",
      <?php endif; ?>
      <?php if($med_info['mt'][0]['med_twitter'][0] !== ""): ?>
          "<?php echo $med_info['mt'][0]['med_twitter'][0]; ?>",
      <?php endif; ?>
      <?php if($med_info['mt'][0]['med_facebook'][0] !== ""): ?>
          "<?php echo $med_info['mt'][0]['med_facebook'][0]; ?>",
      <?php endif; ?>
      <?php if($med_info['mt'][0]['med_linkedin'][0] !== ""): ?>
          "<?php echo $med_info['mt'][0]['med_linkedin'][0]; ?>"
      <?php endif; ?>
        ],
      "nationality" : "<?php echo $med_info['mt'][0]['med_nacionalidad'][0]; ?>",
      "knowsAbout" : "<?php echo $med_info['mt'][0]['med_sabe'][0]; ?>",
      "knowsLanguage" : "<?php echo $med_info['mt'][0]['med_idiomas'][0]; ?>"
      <?php if(count($med_info["a"]) > 0): $count=1;?>
      ,"memberOf": [
      <?php foreach($med_info["a"] as $med_asoc): ?>
      {
        "@type": "Organization",
        "name": "<?php echo $med_asoc->nombre; ?>",
        "telephone": "<?php echo $med_asoc->tel; ?>",
        "email": "<?php echo $med_asoc->email; ?>",
        "address" : {
          "@type" : "PostalAddress",
          "streetAddress" : "<?php echo $med_asoc->calle; ?>",
          "addressLocality" : "<?php echo $med_asoc->municipio; ?>",
          "addressRegion": "<?php echo $med_asoc->estado; ?>",
          "postalCode": "<?php echo $med_asoc->zip; ?>"
        }
      }<?php if($count < count($med_info["a"])):?>,<?php endif;?>
      <?php $count +=1; endforeach; ?>
      ]
      <?php endif; ?>
      <?php if(count($med_info["c"]) > 0 || count($med_info["h"]) > 0): $count=1;?>
      ,"worksFor" : [
        <?php foreach($med_info["c"] as $consultorio): ?>
      {
        "@type": "Physician",
        "name": "<?php echo $consultorio->nombre; ?>",
        "identifier" : "<?php echo $med_info['mt'][0]['med_cedula'][0];?>",
        "telephone": "<?php echo $consultorio->tel; ?>",
        "faxNumber": "<?php echo $consultorio->fax; ?>",
        "image" : "<?php echo $med_info['i']; ?>",
        "areaServed" : "<?php echo $med_info['mt'][0]['med_area_served'][0]; ?>",
        "medicalSpecialty": [
        <?php $spec_count = 1; foreach($med_info["e"] as $med_espec): ?> 
        {
          "@type" : "medicalSpecialty",
          "name" : "<?php echo $med_espec->nombre; ?>",
          "description" : "<?php echo $med_espec->desc; ?>"
        }
        <?php if($spec_count < count($med_info["e"])):?>,<?php endif;?>
        <?php $spec_count+= 1; endforeach; ?>
        ],
        "email": "<?php echo $med_info['mt'][0]['med_email'][0]; ?>",
        "address" : {
          "@type" : "PostalAddress",
          "streetAddress" : "<?php echo $consultorio->calle; ?>",
          "addressLocality" : "<?php echo $consultorio->municipio; ?>",
          "addressRegion": "<?php echo $consultorio->estado; ?>",
          "postalCode": "<?php echo $consultorio->zip; ?>"
        }
      }
        <?php $count += 1; endforeach; ?>
        <?php foreach($med_info["h"] as $hospital): ?>
      ,{
          "@type": "MedicalOrganization",
          "name": "<?php echo $hospital->nombre; ?>",
          "telephone": "<?php echo $hospital->tel; ?>",
          "email": "<?php echo $hospital->email; ?>",
          "address" : {
          "@type" : "PostalAddress",
            "streetAddress" : "<?php echo $hospital->calle; ?>",
            "addressLocality" : "<?php echo $hospital->municipio; ?>",
            "addressRegion": "<?php echo $hospital->estado; ?>",
            "postalCode": "<?php echo $hospital->zip; ?>"
          }
      }
      <?php if($count < count($med_info["c"]) + count($med_info["h"])):?>,<?php endif;?>
        <?php $count += 1; endforeach; ?>
          ]
      <?php endif; ?>
    }
    </script>