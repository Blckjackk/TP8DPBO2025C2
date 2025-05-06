<?php

class ProgramStudiView
{
    public function render($data)
    {
        $no = 1;
        foreach ($data as $prodi) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$prodi['prodi_id']}</td>
                <td>{$prodi['prodi_name']}</td>
                <td>
                    <a href='program_studi.php?delete={$prodi['prodi_id']}' class='btn btn-danger btn-sm'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
    }
}
