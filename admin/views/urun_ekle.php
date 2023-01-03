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
                     <h4 class="card-title"><i class="fas fa-plus-square"></i> Ürün Ekle</h4>
                  </div>
               </div>
               <div class="card-body">

                  <form method="POST" action=""  enctype="multipart/form-data">
                
                      
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Ürün Adı</label>
                              <input type="text" class="form-control" name="product_name" required>
                           </div>
                        </div>
                        <div class="col-md-4 ">
                           <div class="form-group">
                    <label>Ürün Türü</label>
                              <select class="form-control" name="product_type">
                                  <option value="1">Dijital</option>
                                  <option value="2">Fiziksel</option>
                               </select>
                           </div>
                        </div>
                        <div class=" col-md-4 ">
                           <div class="form-group">
                              <label>Ürün Ücreti</label>
                              <input type="text" class="form-control"  name="product_price" required>
                           </div>
                        </div>
                     </div>
                        <hr>
                        
                          <div class="row">
                           <div class="form-group col-md-6">
                              <label>Permalink</label>
                              <input type="text" class="form-control" value="<?php echo $order["product_url"]; ?>" disabled>
                           </div>
                             <div class="form-group col-md-6">
                              <label>Meta Keywords</label>
                              <input type="text" class="form-control" value="<?php echo $order["product_keyword"]; ?>" name="product_keyword">
                           </div>
                           
                        </div>

<div class="form-group">
    
    <label>Meta Açıklama</label>
    <textarea class="form-control" name="product_desc"><?php echo $order["product_desc"]; ?></textarea>
    
</div>
                        <hr>
                        <div class="form-group">
                      <label>Ürün Hakkında</label>
                      <textarea name="product_content" id="summernote"><?php echo $order["product_content"]; ?></textarea>
                   </div>
                        
                        
                        <div class="row">
                        <div class="col-md-8">
        <div class="form-group">
                              <label>Kategori</label>
                              <select class="form-control" name="product_category" required>
                                <?php foreach($categories as $cat){ ?>  
                                  <option value="<?php echo $cat["category_id"]; ?>"><?php echo $cat["category_name"]; ?></option>
                                  <?php } ?>
                               </select>
                           </div>
<hr>

           <div class="form-group">
                      <label>Sipariş Sonrası Gösterilecek Mesaj</label>
                      <textarea name="product_details" id="summernote2" required></textarea>
                   </div>
                   </div>
                   <div class="col-md-4">
                 <label>Ürün Görseli</label><br>             
                 <input type="file" name="logo" id="preferenceLogo" required>

      

   
                   </div>
</div>
                           <button type="submit" class="btn btn-primary ">Ürün ekle</button>
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
      $('#summernote2').summernote({
        placeholder: 'Siparişiniz için teşekkür ederiz...',
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