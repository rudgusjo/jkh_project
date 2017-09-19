var express = require('express');
var router = express.Router();
var dataController = require('../controllers/dataController');
// var loginController = require('../controllers/loginController');

//메인 페이지
router.post('/',dataController.beaconData);

module.exports = router;