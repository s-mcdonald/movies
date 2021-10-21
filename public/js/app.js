//
// Runonce upone loading page
// execute omce function 
// has loaded.
//
(() => {
 
    let string = 'the'; // as in back to the future

    if (!string.length) {
        return;
    }

    //
    // Lets get the dom-el, in future, we could add foreach el, => process()
    // so we can enumerate over multiple searchable elements. 
    //
    const allSearchableText = document.querySelector('.searchable-content');


    //
    // Create the regex from our string
    //
    let regexPattern = new RegExp(string,'gi');

    //
    // Wrap the text function..
    //
    let highlighted = (text) => '<span class="highlight">' + text + '</span>';

    //
    // Just for fun, count the matches
    //
    let totalMatches = (string.match(regexPattern) || []).length;

    //
    // Only log if we get some results
    //
    if (totalMatches > 0)
        console.log("A total of " + totalMatches + " matches of the phrase " + string + " was found");

    //
    // now replace all the found matches with
    // the higjhlighted content
    //
    allSearchableText.innerHTML = allSearchableText.textContent.replaceAll(regexPattern, highlighted);
    

})();