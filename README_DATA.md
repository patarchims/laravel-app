CREATE OR REPLACE VIEW view_cppt_extended AS
SELECT
dsp.\*,
ke.namadokter AS namadokter,
ke2.nama AS namaperawat,
kp.bagian AS namabagian,
dp.id AS pasien_id,
ke3.nama AS nama_handover
FROM vicore_rme.dcppt AS dsp
LEFT JOIN rekam.dregister AS dr ON dsp.noreg = dr.noreg
LEFT JOIN his.dprofilpasien AS dp ON dr.id = dp.id
LEFT JOIN his.ktaripdokter AS ke ON dsp.ppa_finger_ttd = ke.iddokter
LEFT JOIN mutiara.pengajar AS ke2 ON dsp.ppa_finger_ttd = ke2.id
LEFT JOIN vicore_lib.kpelayanan AS kp ON dsp.kd_bagian = kp.kd_bag
LEFT JOIN mutiara.pengajar AS ke3 ON dsp.hand_over = ke3.id;
