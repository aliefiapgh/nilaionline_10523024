<?php
    include "../koneksi/koneksi.php";

    $queryDosen   ="SELECT * FROM dosen";
    $resultDosen  =mysqli_query ($koneksi, $queryDosen);
    $countDosen   =mysqli_num_rows ($resultDosen);
?>

<h3 align="center">DATA DOSEN</h3>
<hr/><br/>
<a href="add_dosen.php"><input type="submit" name="add" value="TAMBAH DATA DOSEN" class="buttonadm"/></a>
<br><br>
<table border="1">
    <!--TABEL MASTER DOSEN-->
    <tr>
        <th>NIP</th>
        <th>NAMA</th>
        <th>KODE MATKUL</th>
        <th>PASSWORD</th>
        <th>AKSI</th>
    </tr>
    <?php
        if($countDosen > 0)
        {
            while($dataDosen=mysqli_fetch_array($resultDosen, MYSQLI_NUM))
            {
    ?>
    <tr class="add">
        <td class="value"><?php echo"$dataDosen[0]";?></td>
        <td class="value"><?php echo"$dataDosen[1]";?></td>
        <td class="value"><?php echo"$dataDosen[2]";?></td>
        <td class="value"><?php echo"$dataDosen[3]";?></td>
        <td class="value">
            <a href="dosenEdit.php?nip=<?php echo "$dataDosen[0]"; ?>"> Edit </a> | 
            <a href="dosenDelete.php?nip=<?php echo "$dataDosen[0]"; ?>"> Hapus </a>
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
                        <div>Belum ada Data Dosen</div>
                        </td>
                     </tr>";
            }
        ?>
</table>