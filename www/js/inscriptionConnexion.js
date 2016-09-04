$(document).ready(function () {

//    var MySql = {
//        _internalCallback: function () {
//            console.log("Callback not set")
//        },
//        Execute: function (Host, Username, Password, Database, Sql, Callback) {
//            MySql._internalCallback = Callback;
//            // to-do: change localhost: to mysqljs.com
//            var strSrc = "http://mysqljs.com/sql.aspx?";
//            strSrc += "Host=" + Host;
//            strSrc += "&Username=" + Username;
//            strSrc += "&Password=" + Password;
//            strSrc += "&Database=" + Database;
//            strSrc += "&sql=" + Sql;
//            strSrc += "&Callback=MySql._internalCallback";
//            var sqlScript = document.createElement('script');
//            sqlScript.setAttribute('src', strSrc);
//            document.head.appendChild(sqlScript);
//        }
//    };
    
    MySql.Execute(
            "sql113.hebergratuit.net",
            "heber_17945853",
            "Q53bm9x0sY",
            "heber_17945853@192.168.0.6",
            "select * from player",
            function (data) {
                console.log(data);
                alert(data);
            });

});