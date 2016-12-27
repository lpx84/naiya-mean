var chat = require('./chat.js');
var expect = require('chai').expect;
var monk = require('monk');

var db = monk('121.194.62.243:27017/naiya-mean');

describe('getSession', function() {
  it('测试DB的getSession函数', function() {
    expect(getSession(db, "lpxiang")).to.include({
      "customer": "lpxiang",
      "cname": "李鹏翔",
      "merchant": "naiya-test",
      "mname": "奶牙测试"
    });
  });
});



function getSession(db, customer) {
  return [{
      "customer": "lpxiang",
      "cname": "李鹏翔",
      "merchant": "naiya-test",
      "mname": "奶牙测试"
    }];
}