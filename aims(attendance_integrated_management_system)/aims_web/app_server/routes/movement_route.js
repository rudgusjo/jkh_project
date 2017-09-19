var express = require('express');
var router = express.Router();
var movementController = require('../controllers/movementController');
var loginController = require('../controllers/loginController');
//이동 정보 페이지
router.get('/',movementController.renderMovementList);

module.exports = router;
