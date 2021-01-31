
<?php
  $source = "https://www.worldometers.info/coronavirus/";
  $content = file_get_contents($source);

  echo $content;
?>

<script>

  var result = document.evaluate('//*[@id="maincounter-wrap"]/div/span', document , null, XPathResult.STRING_TYPE);
  
  document.write("OBITOS: " + result.stringValue);
  
</script>
