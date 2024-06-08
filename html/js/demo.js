document.addEventListener("DOMContentLoaded", function() {
    const button1 = document.getElementById("button1");
    const button2 = document.getElementById("button2");
    const table1 = document.getElementById("mytable");
    const table2 = document.getElementById("myable");

    // Set initial display of tables
    table1.style.display = "table";
    table2.style.display = "none";

    button1.addEventListener("click", function() {
        table1.style.display = "table";
        table2.style.display = "none";
    });

    button2.addEventListener("click", function() {
        table1.style.display = "none";
        table2.style.display = "table";
    });
});
