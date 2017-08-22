//app.js
var common = require('utils/common.js')
App({
  url: 'https://leyao.tv/weishop/index.php?s=/w10/',
  PHPSESSID: '',
  onLaunch: function () {
    common.initApp(this.url, true)
  }
})