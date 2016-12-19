var orm = require("orm");
orm.connect("mysql://naiya:naiya123@121.194.62.243/naiya", function (err, db) {
  
  console.log("executed orm");
  
  var Person = db.define("t_person", {
        name      : String,
        surname   : String,
        age       : Number, // FLOAT
        continent : [ "Europe", "America", "Asia", "Africa", "Australia", "Antartica" ], // ENUM type
        photo     : Buffer, // BLOB/BINARY
        data      : Object // JSON encoded
    }, {
        methods: {
            fullName: function () {
                return this.name + ' ' + this.surname;
            }
        },
        validations: {
            age: orm.enforce.ranges.number(18, undefined, "under-age")
        }
    });
});



module.exports = orm;