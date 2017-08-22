Page({
  /**
   * 页面的初始数据
   */
  data: {
    splash: true,
    splashTime: 3,
    wW: 0,
    wH: 0,
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this,
      splashTime = this.data.splashTime,
      time = ''
    wx.getSystemInfo({
      success: function (res) {
        that.setData({
          wW: res.windowWidth + 'px',
          wH: res.windowHeight + 'px',
        })
      }
    })

    time = setInterval(function () {

      if (splashTime == 0) {
        clearInterval(time)
        wx.switchTab({
          url: '../index/index',
        })
        // that.setData({
        //   splash: false
        // })
      } else {
        that.setData({
          splashTime: --splashTime
        })
      }

    }, 1000)
  },
  nextTap() {
    wx.switchTab({
      url: '../index/index',
    })
    // this.setData({
    //   splash: false
    // })
  },
})