<?php
$koneksi = mysqli_connect("localhost","root","","tugas_semester2");

// ========================================================================================================================

// keluarin data
function data($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $sepeda=[];
    while ($array = mysqli_fetch_assoc($result) ){
        $sepeda[] = $array;
    }    
    return $sepeda;
}

$jumlahdataperhalaman = 5;
$jumlahdata = count(data("SELECT * FROM sepeda"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET['hal'])) ? $_GET['hal'] :1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$keyword = $_GET['keyword'];

$query = "SELECT * FROM sepeda WHERE 
                    name LIKE '%$keyword%' OR
                    kode LIKE '%$keyword%' OR
                    stock LIKE '%$keyword%' OR
                    gambar LIKE '%$keyword%' OR
                    tgl_masuk LIKE '%$keyword%' LIMIT $awaldata, $jumlahdataperhalaman";

$sepeda = data($query);
?>
        <table  class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th width="36"style="text-align:center">No</th>
                    <th width="145" style="text-align:center">kode</th>
                    <th width="160" style="text-align:center">nama</th>
                    <th width="130" style="text-align:center">tanggal masuk</th>
                    <th width="200" style="text-align:center">fitur</th>
                </tr>
            </thead>

            <?php if (empty($sepeda)){?>
                <tr>
                    <td colspan="7">
                        <p>tidak ada data</p>
                    </td>
                </tr>
            <?php }?>

            <tbody>
                <?php $i =1;?>
                <?php foreach($sepeda as $x){?>
                    <tr>
                        <td width="45"  height="1" style="text-align:center"><?php echo $i + $awaldata;?></td>
                        <td width="232"style="text-align:center"><?php echo $x['kode'];?></td>
                        <td width="258"style="text-align:center"><?php echo $x['name'];?></td>
                       
                        <td width="208"style="text-align:center"><?php echo $x['tgl_masuk'];?></td>
                        <td width="305"style="text-align:center">
                            <!-- <a href="detail.php?id=<?php echo $x['id'];?>" class='btn btn-secondary btn-sm'>detail</a> -->
                            <a href="index.php?page=detail&id_detail=<?php echo $x['id'];?>" class="btn btn-primary p-1">Detail</a>|
                            <a href="index.php?page=ubah&id=<?php echo $x['id'];?>"class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square p-1.5" data-toggle="tooltip" title="Edit Data"></i></a>|
                            <a href="crud/hapus.php?id=<?php echo $x['id'];?>"class="btn btn-danger btn-sm" onclick="return confirm('apakah anda ingin menghapus <?php echo $x['name'];?>')";><i class="fa-solid fa-trash-can p-1.5" data-toggle="tooltip" title="Hapus Data"></i></a>
                            
                        </td>
                    </tr>
                    <?php $i++;?>
                <?php }?>
            </tbody>
        </table>
        <div class="pull-right ">
        <div class="pagination">
        <?php if ($halamanaktif > 1) :?>
    <a href='?page=sepeda&hal=<?php echo $halamanaktif - 1;?>'>&laquo;</a>
<?php endif; ?>

<?php for ( $i = 1 ; $i<=$jumlahhalaman ; $i++ ) :?>
    <?php if ($i == $halamanaktif ):?>
        <a href='index.php?page=sepeda&hal=<?php echo $i?>' class="active"><?php echo $i;?></a>
    <?php else:?>
        <a href='index.php?page=sepeda&hal=<?php echo $i?>'><?php echo $i;?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if ($halamanaktif < $jumlahhalaman) : ?>
    <a href='index.php?page=sepeda&hal=<?php echo $halamanaktif + 1;?>'>&raquo;</a>
<?php endif; ?>
</div>
</div>