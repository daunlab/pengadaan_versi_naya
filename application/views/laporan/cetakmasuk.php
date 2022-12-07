<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Barang</title>
  
  <?php $this->load->view('navigator/bootsraponly') ?>
  
  <style>
    @page {
        size: 21cm 29.7cm;
        margin: 3mm 4mm 3mm 4mm;
         /* change the margins as you want them to be. */
    }
    div.page, div.appendix {
        page-break-after: always;
        width: 21cm;
        margin: auto;
    }
    div.titlepage {
        page: blank;
    }
    
  </style>
  
</head>
<body>
  <div style="margin: auto;">
    <div class='page'>
      <div class='titlepage text-center'>
        <h1>Daftar Barang Masuk</h1>
        <h5 class='text-muted'>DERAN KUSEN</h5>
      </div>
      
      <div>
        <table class='table table-striped'>
        
          <thead class='text-center'>
            <tr>
          <td>id_masuk</td>
              <td>id_suplier</td>
              <td>nama_suplier</td>
              <td>nama_perusahaan</td>
              <td>nama </td>
              <td>satuan</td>
              <td>jenis</td>
              <td>harga</td>
              <td>tanggal</td>
            </tr>
          </thead>
          
          <tbody class='text-center'>
          
            <?php     
               var_dump($lasttrx);
              foreach ($masuk as  $k => $v) {  
              var_dump($lasttrxS);
                # code...
                $content = "";
                $content = "<tr>";
                $content .= "<td>".$v->id_masuk."</td>";
                $content .= "<td>".$v->id_suplier."</td>";
                $content .= "<td>".$v->nama_suplier."</td>";
                $content .= "<td>".$v->nama_perusahaan."</td>";
                $content .= "<td>".$v->nama."</td>";
                $content .= "<td>".$v->satuan."</td>";
                $content .= "<td>".$v->jenis."</td>";
                $content .= "<td>".$v->harga."</td>";
                $content .= "<td>".$v->tanggal."</td>";
                $content .= "</tr>";
                
                echo "$content";
              }
              
            
            ?>
          
          </tbody>
          
          <tfooter>
            <tr>
              <td class='text-center'>id_masuk</td>
              <td class='text-center'>id_suplier</td>
              <td class='text-center'>nama_suplier</td>
              <td class='text-center'>nama_perusahaan</td>
              <td class='text-center'>nama</td>
              <td class='text-center'>satuan</td>
              <td class='text-center'>jenis</td>
              <td class='text-center'>harga</td>
              <td class='text-center'>tanggal</td>
            </tr>
          </tfooter>
        </table>
      </div>
      
    </div>
  </div>
  
</body>
</html>