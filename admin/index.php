<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Tattooaria Lounge Ink</title>
  <link href="../img/logo.jpg" rel="icon">
  
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <?php 
    include 'header.php';
    $nome = $_SESSION['nome'];
  ?>

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">

    <p class="lead" align="right">Usuário logado: <?php echo $nome;?> em <?php echo date('d/m/y');?></p>
      <div class="starter-template">
        <h1>Sistema PHP</h1>
        <p class="lead">Utilize o menu acima para executar as ações desejadas.</p>
      </div>

      <h1 class="mt-5">Sticky footer with fixed navbar</h1>
      <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
      <p>Back to <a href="{{ site.baseurl }}/docs/{{ site.docs_version }}/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>
    
      <h1 class="mt-5">Sticky footer with fixed navbar</h1>
      <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
      <p>Back to <a href="{{ site.baseurl }}/docs/{{ site.docs_version }}/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>
      
      <h1 class="mt-5">Sticky footer with fixed navbar</h1>
      <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
      <p>Back to <a href="{{ site.baseurl }}/docs/{{ site.docs_version }}/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>
     
      <h1 class="mt-5">Sticky footer with fixed navbar</h1>
      <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
      <p>Back to <a href="{{ site.baseurl }}/docs/{{ site.docs_version }}/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>
  
    </div>
  </main>

  <?php include 'footer.php'?>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-slim.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>