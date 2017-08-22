// pages/card/card.js
var app = getApp()
Page({
  data: {},
  addCard: function () {
    console.log('=========addCard begin=========')
    var openid = wx.getStorageSync('openid')

    wx.request({
      url: app.url + 'Api/Api/addCard',
      data: { openid: openid, id: 2 },
      success: function (result) {
        var res = result.data

        if (typeof wx.addCard === 'function') {
          wx.addCard({
            cardList: [
              {
                cardId: res.card_id,
                cardExt: '{"timestamp":' + res.timestamp + ',"nonce_str":"' + res.nonce_str + '","card_id":"' + res.card_id + '","signature":"' + res.signature + '","code":"' + res.code + '","openid":"' + res.openid + '"}'
              }
            ],
            success: function (res) {
              console.log('============= addCard success==========')
              console.log(res.cardList) // 卡券添加结果
            }
          })
        } else {
          wx.showModal({
            title: '提示',
            content: '当前微信版本过低，无法使用该功能，请升级到最新微信版本后重试。'
          })
        }

      }
    })
  },
  show: function () {
    wx.openCard({
      cardList: [
        {
          cardId: 'prgF0t5TTYf8SfKtbXU3JRltG86U',
          code: '379240042603'
        }
      ],
      success: function (res) {
        console.log('=============openCard success==========')
        console.log(res)
      }
    })
  }
})