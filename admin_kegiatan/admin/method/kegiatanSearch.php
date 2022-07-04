<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');

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
$jumlahdata = count(data("SELECT * FROM kegiatan"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET['hal'])) ? $_GET['hal'] :1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$keyword = $_GET['keyword'];

$kegiatanQuery = "SELECT * FROM kegiatan WHERE 
                    judul LIKE '%$keyword%' OR
                     LIMIT $awaldata, $jumlahdataperhalaman";

$kegiatan = data($kegiatanQuery);
?>
        <table  class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th width="36"style="text-align:center">No</th>
                    <th width="145" style="text-align:center">judul</th>
                    <th width="160" style="text-align:center">narasumber</th>
                    <th width="130" style="text-align:center">tanggal kegiatan</th>
                    <th width="200" style="text-align:center">fitur</th>
                </tr>
            </thead>

            <?php if (empty($kegiatan)){?>
                <tr>
                    <td colspan="7">
                        <p>tidak ada data</p>
                    </td>
                </tr>
            <?php }?>

            <tbody>
                <?php $i =1;?>
                <?php foreach($kegiatan as $x){?>
                    <tr>
                        <td width="45"  height="1" style="text-align:center"><?php echo $i + $awaldata;?></td>
                        <td width="232"style="text-align:center"><?php echo $x['judul'];?></td>
                        <td width="258"style="text-align:center"><?php echo $x['narasumber'];?></td>
                       
                        <td width="208"style="text-align:center"><?php echo $x['tanggal'];?></td>
                        <td width="305"style="text-align:center">
                            <!-- <a href="detail.php?id=<?php echo $x['id'];?>" class='btn btn-secondary btn-sm'>detail</a> -->
                            <a href="index.php?page=detailKegiatan&id_detail=<?php echo $x['id'];?>" class="btn btn-primary p-1">Detail</a>|
                            <a href="index.php?page=ubahKegiatan&id=<?php echo $x['id'];?>"class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square p-1.5" data-toggle="tooltip" title="Edit Data"></i></a>|
                            <a href="hapus.php?id=<?php echo $x['id'];?>"class="btn btn-danger btn-sm" onclick="return confirm('apakah anda ingin menghapus <?php echo $x['judul'];?>')";><i class="fa-solid fa-trash-can p-1.5" data-toggle="tooltip" title="Hapus Data"></i></a>
                            
                        </td>
                    </tr>
                    <?php $i++;?>
                <?php }?>
            </tbody>
        </table>
        <div class="pull-right ">
        <div class="pagination">
        <?php if ($halamanaktif > 1) :?>
    <a href='?page=kegiatan&hal=<?php echo $halamanaktif - 1;?>'>&laquo;</a>
<?php endif; ?>

<?php for ( $i = 1 ; $i<=$jumlahhalaman ; $i++ ) :?>
    <?php if ($i == $halamanaktif ):?>
        <a href='index.php?page=kegiatan&hal=<?php echo $i?>' class="active"><?php echo $i;?></a>
    <?php else:?>
        <a href='index.php?page=kegiatan&hal=<?php echo $i?>'><?php echo $i;?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if ($halamanaktif < $jumlahhalaman) : ?>
    <a href='index.php?page=kegiatan&hal=<?php echo $halamanaktif + 1;?>'>&raquo;</a>
<?php endif; ?>
</div>
</div>