var app = getApp()

function initApp(baseUrl, needUserInfo) {
  var openid = wx.getStorageSync('openid')
  var PHPSESSID = wx.getStorageSync('PHPSESSID')

  if (openid == '' || PHPSESSID == '') {
    setLogin(baseUrl, needUserInfo)
  } else {
    //小程序登录状态检查
    wx.checkSession({
      success: function () {
        console.log('小程序登录态正常')
        //小程序登录态正常，接着检查后端PHP用户登录态
        var sessid = wx.getStorageSync('PHPSESSID')
        if (sessid == '') {
          setLogin(baseUrl, needUserInfo);
        } else {
          //判断是否已登录
          console.log('需要从后端判断用户有没有登录过')
          wx.request({
            url: baseUrl + 'Api/Api/checkLogin',  //需要从后端判断用户有没有登录过
            data: {
              PHPSESSID: wx.getStorageSync('PHPSESSID')  //一定要带上PHPSESSID，否则后端系统不知道哪个用户
            },
            success: function (res) {
              console.log('checkLogin的结果：' + res.data.status)
              if (res.data.status == 0) {
                setLogin(baseUrl, needUserInfo);
              }
            }
          })
        }
      },
      fail: function () {
        console.log('登录态过期')
        //登录态过期
        setLogin(baseUrl, needUserInfo) //重新登录
      }
    })
  }

}

function setLogin(baseUrl, needUserInfo) {
  console.log('setLogin:' + baseUrl)
  wx.login({
    success: function (res) {
      if (res.code) { //使用小程序登录接口完成后端用户登录
        wx.request({
          url: baseUrl + 'Api/Api/sendSessionCode',
          data: {
            code: res.code
          },
          success: function (res) {
            console.log(res)
            if (typeof res.data == "string") {
              res = JSON.parse(res.data)
            } else {
              res = res.data
            }
            console.log('获取到了phpsessid:' + res.data.PHPSESSID)
            console.log('openid:' + res.data.openid)
            //把sessid保存到缓存里
            wx.setStorageSync("PHPSESSID", res.data.PHPSESSID)
            wx.setStorageSync("openid", res.data.openid)

            //登录成功后判断用户是否已初始化化，如没则自动初始化化
            if (needUserInfo) {
              autoReg(baseUrl)
            }
          }
        })
      } else {
        console.log('获取用户登录态失败！' + res.errMsg)
      }
    }
  });
}
function saveUserInfo(baseUrl, res) {
  wx.setStorageSync("userInfo", res.userInfo)
  wx.request({
    url: baseUrl + 'Api/Api/saveUserInfo',
    data: {
      iv: res.iv,
      encryptedData: res.encryptedData,
      PHPSESSID: wx.getStorageSync('PHPSESSID')
    }
  })
}
function autoReg(baseUrl) {
  //判断是否完成自动注册
  var checkReg = true
  try {
    var userInfo = wx.getStorageSync('userInfo') //通过缓存判断就行，即使用户清缓存也无影响，顶多再保存一次而已
    if (!userInfo) {
      checkReg = false
    }
  } catch (e) {
    checkReg = false
  }

  if (checkReg == true) {
    return true
  }

  wx.getUserInfo({
    success: function (res) {
      saveUserInfo(baseUrl, res)
    },
    fail: function (e) {
      wx.showModal({
        title: '提示',
        content: '获取用户信息失败，请点击授权重新获取',
        cancelText: '不授权',
        confirmText: '授权',
        success: function (res) {
          if (res.confirm) {
            wx.openSetting({
              success: (res) => {
                if (res.authSetting["scope.userInfo"]) {
                  wx.getUserInfo({
                    success: function (res) {
                      saveUserInfo(baseUrl, res)
                    }
                  })
                }
              }
            })
          }
        }
      })
    }
  })
}


module.exports = {
  initApp: initApp
}