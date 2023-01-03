<?php include 'header.php'; ?>

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="content-page rtl-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
             
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title"><i class="fas fa-question-circle"></i> Soru Ekle</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action="" >
                
                      
                           <div class="form-group">
                              <label>Soru Adı</label>
                              <input type="text" class="form-control" name="faq_name">
                           </div>
                   
                     
  
           <div class="form-group">
                      <label>Soru Açıklama</label>
                      <textarea name="faq_content" id="summernote"></textarea>
                   </div>
       
                 
              <?php
              
              $id = $order["faq_id"];
              
              ?>
      

                           <button type="submit" class="btn btn-primary ">Soruyu Ekle</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

 <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
        ]
      });
    </script>

<?php include 'footer.php'; ?>