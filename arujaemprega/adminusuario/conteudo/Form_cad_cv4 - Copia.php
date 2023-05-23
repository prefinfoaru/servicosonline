<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/d7mf8inz10za7x62gz4c3g9zny7wl7gk3hnswc2nj5r77wun/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<div class="main-panel">
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg " color-on-scroll="100">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Menu Listar Vagas</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                   
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- Navbar -->
      
         <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

<!--    
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet" />

     <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

        <div class="content">
                                <!-- DataTales Example -->
					<div class="card">

          <form action="./conteudo/teste.php" method="POST">
  <textarea id="basic-example" name="texto">
    
  </textarea>

  <button type="submit" name="cadastrar" class="btn btn-danger  pull-CENTER" type="button">APROVAR</button>
  </form>
  </div>
  </div>
  </div>
  <script>


 tinymce.init({
  selector: 'textarea#basic-example',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});





  </script>









</body>
</html>