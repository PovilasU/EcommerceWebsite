var xmlHttp = createXmlHttpRequestObject();

//Function to create the xmlHttp object for communication
function createXmlHttpRequestObject() {
    var xmlHttp;

    if(window.ActiveXObject){
        try{
            // if someone is using IE
            xmlHttp = new ActiveXObject("Mircrosoft.XMLHTTP");
        } catch(e){
            xmlHttp = false;
        }
    } else {
        try{
            // if user using browser like  Chrome, mozilla ...
            // object allows to comunnicate  with the server behind the scene
            xmlHttp = new XMLHttpRequest();
        } catch(e){
            xmlHttp = false;
        }

    }
    if(!xmlHttp)
        alert("Cant create that object!");
    else
        return xmlHttp;
}

//Sending request to the server
//Function to communicate with a server
function process() {
    // checks if ojbect is free
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4) {
        product = encodeURIComponent(document.getElementById("userInput").value);
        //creates type of request what we want
        xmlHttp.open("GET", "searchbar.php?product=" + product, true); // prepare request
        xmlHttp.onreadystatechange = handleServerResponse; //update webpage(creating an element)
        xmlHttp.send(null); //null because we using GET, send request
    }else{
        setTimeout('process()', 1000);//if can not send request wait a second and send again
    }
}

//Function whatever receive response from server what you wanna do with it
// it sends back in xml file
function handleServerResponse() {
    // state 4 stands for whatever object is done communicating with the server
    if(xmlHttp.readyState==4){
        // check the status
        // status 200 means that communication session went ok
        if(xmlHttp.status==200){
            xmlResponse = xmlHttp.responseXML;
            //pulling everything out
            xmlDocumentElement = xmlResponse.documentElement;
            //message is what we want put out on the screen
            message = xmlDocumentElement.firstChild.data;
            document.getElementById("underInput").innerHTML='<span style="color:blue">'+
            message + '</span>';
            setTimeout('process()', 1000);
        }else{
            alert('Something went wrong!');
        }

    }

}