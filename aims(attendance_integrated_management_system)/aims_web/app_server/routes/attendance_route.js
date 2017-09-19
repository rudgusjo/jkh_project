var express = require('express');
var router = express.Router();
var attendanceController = require('../controllers/attendanceController');
var loginController = require('../controllers/loginController');
//loginController.check추가

//금일 출석자 정보
router.get('/list', attendanceController.renderList);
//금일 지각자 정보
router.get('/lateList', attendanceController.renderLateList);
//금일 결석자 정보
router.get('/absenceList', attendanceController.renderAbsenceList);
//지각자 랭크 정보
router.get('/lateRank', attendanceController.renderLateRank);
//전체 정보
router.get('/history', attendanceController.renderHistory);

module.exports = router;
