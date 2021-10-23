//
// Runonce upone loading page
// execute omce function 
// has loaded.
//
(() => {
 
    // The try catch is just checking to see if 
    // the variable is defined.
    try {
        userphrase;
    } 
    catch(e) {
        console.log('userphrase is not defined');
        return;
    }

    // defined in the blade view
    let string =  userphrase.replaceAll("%20"," ");

    if (!string.length) {
        console.log("Insufficient Phrase Length to highlight");
        return;
    }

    //
    // Fn to Wrap the text.
    //
    let highlighted = (text) => '<span class="highlight">' + text + '</span>';

    //
    // Find all elements with the designated class
    //
    const allSearchableText = document.querySelectorAll('.searchable-content');

    //
    // Create the regex from our string
    // Here we are using `i` for case
    // insensitive
    //
    let regexPattern = new RegExp(string,'gi');

    //
    // now replace all the found matches with
    // the higjhlighted content. Need to
    // loop through all elements that
    // are classed accordingly.
    //
    allSearchableText.forEach(e =>  
        e.innerHTML = e.textContent.replaceAll(regexPattern, highlighted)
    );

})();