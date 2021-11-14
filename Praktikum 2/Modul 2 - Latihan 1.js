function loop() {
    for (var i=1; i<=6; i++){
        for (var j=1; j<=i; j++){
            document.write("<b>"+j+"</b>");
        }
        document.write("<br>");
    }
    for (let j=5; j>=1; j--){
        for (let i=1; i<=j; i++){
            document.write(i);
        }
        document.write("<br>");
    }
}
