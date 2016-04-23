function clearNode(nodo) {
	while (nodo.firstChild) {
		nodo.removeChild(nodo.firstChild);
	}
};

elem = document.createElement.bind(document);
text = document.createTextNode.bind(document);
elemById = document.getElementById.bind(document);

elemAppend = function() {
    for (var i = 1; i < arguments.length; i++) {
        arguments[0].appendChild(arguments[i]);
    }
    
    return arguments[0];
}