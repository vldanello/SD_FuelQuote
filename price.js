function pricing(gallons){
    switch (true){
        case gallons < 50:
            document.getElementById("totalAmountDue").value=1.70*gallons;
            return 1.70;
            break;
        case gallons < 100 :
            document.getElementById("totalAmountDue").value=1.60*gallons;
            return 1.60;
            break;
        case gallons < 1000:
            document.getElementById("totalAmountDue").value=1.50*gallons;
            return 1.50;
            break;
        default: 
            document.getElementById("totalAmountDue").value=1.00*gallons;
            return 1.00;
    }
}
