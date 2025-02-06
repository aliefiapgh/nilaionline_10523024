<?php
    include "../koneksi/koneksi.php";

    $queryMatkul   ="SELECT * FROM matakuliah";
    $resultMatkul   =mysqli_query ($koneksi, $queryMatkul);
    $countMatkul   =mysqli_num_rows ($resultMatkul);
?>

<h3>DATA MATA KULIAH</h3>
<hr/><br/>
<a href="matkulAdd.php"><input type="submit" name="add" value="TAMBAH DATA MATA KULIAH" class="buttonadm"/></a>
<br><br>
<table border="1">
    <!--TABEL MASTER MATA KULIAH-->
    <tr>
        <th>KODE MATKUL</th>
        <th>NAMA MATKUL</th>
        <th>AKSI</th>
    </tr>
    <?php
        if($countMatkul > 0)
        {
            while($dataMatkul=mysqli_fetch_array($resultMatkul, MYSQLI_NUM))
            {
    ?>
    <tr class="add">
        <td class="value"><?php echo"$dataMatkul[0]";?></td>
        <td class="value"><?php echo"$dataMatkul[1]";?></td>
        <td class="value">
            <a href="matkulEdit.php?kode_mtkul=<?php echo "$dataMatkul[0]"; ?>"> Edit </a> | 
            <a href="matkulDelete.php?kode_mtkul=<?php echo "$dataMatkul[0]"; ?>"> Hapus </a>
        </td>
    <tr>
    </tr>

    
    <?php
            }
            }
            else
            {
                echo"<tr>
                        <td colspan='10' align='center' height='20'>
                        <div>Belum ada MATA KULIAH</div>
                        </td>
                     </tr>";
            }
        ?>
</table>