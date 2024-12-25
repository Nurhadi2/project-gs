<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReportController extends BaseController
{

    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // check is query params exist
        if ($this->request->getGet('start_month') && $this->request->getGet('end_month') && $this->request->getGet('year')) {
            $startMonth = (int)$this->request->getGet('start_month');
            $endMonth = (int)$this->request->getGet('end_month');
            $year = $this->request->getGet('year');

            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            $startIndex = $startMonth;
            $endIndex = $endMonth;

            $selectedMonthsIndex = [];
            $selectedMonthsName = [];

            for ($i = $startIndex; $i <= $endIndex; $i++) {
                $selectedMonthsIndex[] = $i;
                $selectedMonthsName[] = $months[$i - 1];
            }

            $query = "SELECT
                    tb_kecamatan.id_kecamatan,
                    tb_kecamatan.nama_kecamatan,
                    tb_final.* 
                FROM
                    tb_kecamatan
                    LEFT JOIN (SELECT
                t1.id_kecamatan AS id_kecamatan_ready,
                t1.nama_kecamatan AS nama_kecamatan_ready,
                ";

            for ($i = 0; $i < count($selectedMonthsIndex); $i++) {
                $query .= "IFNULL((
                    SELECT
                        SUM( tb_transaksi_tanam.total_area ) AS total 
                    FROM
                        tb_transaksi_tanam
                        LEFT JOIN tb_lahan ON tb_transaksi_tanam.id_lahan = tb_lahan.id_lahan
                        LEFT JOIN tb_petani ON tb_lahan.id_petani = tb_petani.id_petani
                        LEFT JOIN tb_kelompok_tani ON tb_petani.id_kelompok_tani = tb_kelompok_tani.id_kelompok_tani 
                    WHERE
                        tb_kelompok_tani.id_kecamatan = t1.id_kecamatan 
                        AND tb_transaksi_tanam.bulan = $selectedMonthsIndex[$i] 
                        AND tb_transaksi_tanam.tahun = $year 
                        ),
                    0 
                ) AS Tanam$selectedMonthsName[$i],";
            }

            $query .= "SUM( t1.totalAreaTanam ) AS totalAreaTanam,";

            for ($i = 0; $i < count($selectedMonthsIndex); $i++) {
                $query .= "IFNULL((
                    SELECT
                        SUM( tb_transaksi_panen.total_area ) AS total 
                    FROM
                        tb_transaksi_panen
                        LEFT JOIN tb_lahan ON tb_transaksi_panen.id_lahan = tb_lahan.id_lahan
                        LEFT JOIN tb_petani ON tb_lahan.id_petani = tb_petani.id_petani
                        LEFT JOIN tb_kelompok_tani ON tb_petani.id_kelompok_tani = tb_kelompok_tani.id_kelompok_tani 
                    WHERE
                        tb_kelompok_tani.id_kecamatan = t1.id_kecamatan 
                        AND tb_transaksi_panen.bulan = $selectedMonthsIndex[$i] 
                        AND tb_transaksi_panen.tahun = $year
                        ),
                    0 
                ) AS Panen$selectedMonthsName[$i],";
            }

            $query .= "SUM( t1.totalAreaPanen ) AS totalAreaPanen,
                    SUM( t1.totalUrea ) AS totalUrea,
                    SUM( t1.totalProduksi ) AS totalProduksi 
                FROM
                    (
                    SELECT
                        tb_kecamatan.id_kecamatan,
                        tb_kecamatan.nama_kecamatan,
                        tb_lahan.luas,
                        tb_transaksi_tanam.total_area AS totalAreaTanam,
                        tb_transaksi_tanam.urea AS totalUrea,
                        0 AS totalAreaPanen,
                        0 AS totalProduksi 
                    FROM
                        tb_kecamatan
                        LEFT JOIN tb_kelompok_tani ON tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan
                        LEFT JOIN tb_petani ON tb_kelompok_tani.id_kelompok_tani = tb_petani.id_kelompok_tani
                        LEFT JOIN tb_lahan ON tb_petani.id_petani = tb_lahan.id_petani
                        LEFT JOIN tb_transaksi_tanam ON tb_lahan.id_lahan = tb_transaksi_tanam.id_lahan 
                    WHERE
                        tb_transaksi_tanam.bulan BETWEEN $startMonth 
                        AND $endMonth 
                        AND tb_transaksi_tanam.tahun = 2024 UNION
                    SELECT
                        tb_kecamatan.id_kecamatan,
                        tb_kecamatan.nama_kecamatan,
                        tb_lahan.luas,
                        0 AS totalAreaTanam,
                        0 AS totalUrea,
                        tb_transaksi_panen.total_area AS totalAreaPanen,
                        tb_transaksi_panen.produksi AS totalProduksi 
                    FROM
                        tb_kecamatan
                        LEFT JOIN tb_kelompok_tani ON tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan
                        LEFT JOIN tb_petani ON tb_kelompok_tani.id_kelompok_tani = tb_petani.id_kelompok_tani
                        LEFT JOIN tb_lahan ON tb_petani.id_petani = tb_lahan.id_petani
                        LEFT JOIN tb_transaksi_panen ON tb_lahan.id_lahan = tb_transaksi_panen.id_lahan 
                    WHERE
                        tb_transaksi_panen.bulan BETWEEN $startMonth 
                        AND $endMonth 
                        AND tb_transaksi_panen.tahun = 2024 
                    ) AS t1 
                GROUP BY
                    t1.id_kecamatan) AS tb_final ON tb_final.id_kecamatan_ready = tb_kecamatan.id_kecamatan;";

            $dataRow = $this->db->query($query)->getResultArray();
            $return = array(
                'status' => 200,
                'data' => [
                    'data' => $dataRow,
                    'months' => $selectedMonthsName,
                    'length' => count($selectedMonthsName),
                    'startMonth' => $startMonth,
                    'endMonth' => $endMonth,
                    'year' => $year
                ],
                'message' => 'success',

            );

            $data["filtered"] = $return;

            // dd($data);
        }

        $data['title'] = 'Report';
        $data['months'] = $this->db->query("SELECT * FROM tb_bulan")->getResultArray();
        $data['years'] = range(date('Y'), 2021);

        return view('report/index', $data);
    }

    public function reportAjax()
    {
        $startMonth = (int)$this->request->getPost('start_month');
        $endMonth = (int)$this->request->getPost('end_month');
        $year = $this->request->getPost('year');

        // dd($startMonth, $endMonth, $year);

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Find the numeric representation of the start and end months
        // Add 1 to match PHP's 1-based month index
        $startIndex = $startMonth;
        $endIndex = $endMonth;

        $selectedMonthsIndex = [];
        $selectedMonthsName = [];

        // echo 'startIndex: ' . $startIndex . '<br>';
        // echo 'endIndex: ' . $endIndex . '<br>';

        for ($i = $startIndex; $i <= $endIndex; $i++) {
            $selectedMonthsIndex[] = $i;
            $selectedMonthsName[] = $months[$i - 1];
        }

        // print_r($selectedMonthsIndex);
        // echo '<br>';
        // print_r($selectedMonthsName);
        // die;

        $query = "SELECT
                tb_kecamatan.id_kecamatan,
                tb_kecamatan.nama_kecamatan,
                tb_final.* 
            FROM
                tb_kecamatan
                LEFT JOIN (SELECT
	        t1.id_kecamatan AS id_kecamatan_ready,
	        t1.nama_kecamatan AS nama_kecamatan_ready,
	        ";

        for ($i = 0; $i < count($selectedMonthsIndex); $i++) {
            $query .= "IFNULL((
                SELECT
                    SUM( tb_transaksi_tanam.total_area ) AS total 
                FROM
                    tb_transaksi_tanam
                    LEFT JOIN tb_lahan ON tb_transaksi_tanam.id_lahan = tb_lahan.id_lahan
                    LEFT JOIN tb_petani ON tb_lahan.id_petani = tb_petani.id_petani
                    LEFT JOIN tb_kelompok_tani ON tb_petani.id_kelompok_tani = tb_kelompok_tani.id_kelompok_tani 
                WHERE
                    tb_kelompok_tani.id_kecamatan = t1.id_kecamatan 
                    AND tb_transaksi_tanam.bulan = $selectedMonthsIndex[$i] 
                    AND tb_transaksi_tanam.tahun = $year 
                    ),
                0 
            ) AS Tanam$selectedMonthsName[$i],";
        }

        $query .= "SUM( t1.totalAreaTanam ) AS totalAreaTanam,";

        for ($i = 0; $i < count($selectedMonthsIndex); $i++) {
            $query .= "IFNULL((
                SELECT
                    SUM( tb_transaksi_panen.total_area ) AS total 
                FROM
                    tb_transaksi_panen
                    LEFT JOIN tb_lahan ON tb_transaksi_panen.id_lahan = tb_lahan.id_lahan
                    LEFT JOIN tb_petani ON tb_lahan.id_petani = tb_petani.id_petani
                    LEFT JOIN tb_kelompok_tani ON tb_petani.id_kelompok_tani = tb_kelompok_tani.id_kelompok_tani 
                WHERE
                    tb_kelompok_tani.id_kecamatan = t1.id_kecamatan 
                    AND tb_transaksi_panen.bulan = $selectedMonthsIndex[$i] 
                    AND tb_transaksi_panen.tahun = $year
                    ),
                0 
            ) AS Panen$selectedMonthsName[$i],";
        }

        $query .= "SUM( t1.totalAreaPanen ) AS totalAreaPanen,
                SUM( t1.totalUrea ) AS totalUrea,
                SUM( t1.totalProduksi ) AS totalProduksi 
            FROM
                (
                SELECT
                    tb_kecamatan.id_kecamatan,
                    tb_kecamatan.nama_kecamatan,
                    tb_lahan.luas,
                    tb_transaksi_tanam.total_area AS totalAreaTanam,
                    tb_transaksi_tanam.urea AS totalUrea,
                    0 AS totalAreaPanen,
                    0 AS totalProduksi 
                FROM
                    tb_kecamatan
                    LEFT JOIN tb_kelompok_tani ON tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan
                    LEFT JOIN tb_petani ON tb_kelompok_tani.id_kelompok_tani = tb_petani.id_kelompok_tani
                    LEFT JOIN tb_lahan ON tb_petani.id_petani = tb_lahan.id_petani
                    LEFT JOIN tb_transaksi_tanam ON tb_lahan.id_lahan = tb_transaksi_tanam.id_lahan 
                WHERE
                    tb_transaksi_tanam.bulan BETWEEN $startMonth 
                    AND $endMonth 
                    AND tb_transaksi_tanam.tahun = 2024 UNION
                SELECT
                    tb_kecamatan.id_kecamatan,
                    tb_kecamatan.nama_kecamatan,
                    tb_lahan.luas,
                    0 AS totalAreaTanam,
                    0 AS totalUrea,
                    tb_transaksi_panen.total_area AS totalAreaPanen,
                    tb_transaksi_panen.produksi AS totalProduksi 
                FROM
                    tb_kecamatan
                    LEFT JOIN tb_kelompok_tani ON tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan
                    LEFT JOIN tb_petani ON tb_kelompok_tani.id_kelompok_tani = tb_petani.id_kelompok_tani
                    LEFT JOIN tb_lahan ON tb_petani.id_petani = tb_lahan.id_petani
                    LEFT JOIN tb_transaksi_panen ON tb_lahan.id_lahan = tb_transaksi_panen.id_lahan 
                WHERE
                    tb_transaksi_panen.bulan BETWEEN $startMonth 
                    AND $endMonth 
                    AND tb_transaksi_panen.tahun = 2024 
                ) AS t1 
            GROUP BY
                t1.id_kecamatan) AS tb_final ON tb_final.id_kecamatan_ready = tb_kecamatan.id_kecamatan;";

        // echo $query;
        // die;

        $data = $this->db->query($query)->getResultArray();
        $return = array(
            'status' => 200,
            'data' => [
                'data' => $data,
                'months' => $selectedMonthsName,
                'length' => count($selectedMonthsName),
            ],
            'message' => 'success',

        );
        echo json_encode($return);
    }
}
