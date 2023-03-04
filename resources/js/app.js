if (JSON.parse(localStorage.getItem("darkMode"))) {
    $("html").addClass("dark");
    $("#changeDarkMode > svg").toggleClass("hidden");
}

//Navigation

//--Responsive navigation toggle
if ($("#navigationToggle")) {
    $("#navigationToggle").on("click", function () {
        $("#navigationToggle > svg").toggleClass("hidden");
        $("#navigationList").toggleClass("translate-x-0 opacity-100");
    });
}

if ($("#changeDarkMode")) {
    $("#changeDarkMode").on("click", function () {
        $("#changeDarkMode > svg").toggleClass("hidden");
        localStorage.setItem(
            "darkMode",
            !JSON.parse(localStorage.getItem("darkMode"))
        );

        $("html").toggleClass("dark");
    });
}

//
