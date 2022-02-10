<main>
    <div id="cardcontainer" class="cardscontainer">
        <div id="card" class="card sample">
            <div class="question flex">

            </div>
            <div class="snippet">

            </div>
            <div id="options" class="options">
                <div class="option1 opt">A. </div>
                <div class="option2 opt">B. </div>
                <div class="option3 opt">C. </div>
                <div class="option4 opt">D. </div>
            </div>
            <div class="showcontainer">
                <div id="showbutton" class="show showbtn">Show Answer</div>
                <div class="answer showanswer">
                    <div class="ans"><span>Answer.</span> </div>
                    <div class="explainee"><span>Explanation.</span> </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    let card = document.getElementById("card")
    let cardcontainer = document.getElementById("cardcontainer")

    let children = options.children
    let data
    fetch("./questions.json")
        .then(val => val.json())
        .then(val => {
            data = val
            data.map(val => {
                let cardh = card.cloneNode(true)
                cardh.classList.remove("sample")
                let childrens = [...cardh.children]
                // console.log(val)

                childrens.forEach(child => {
                    
                    if(child.classList.contains("question"))
                    {
                        child.append(val.Question)
                    }
                    let options=[...child.children]
                    if(child.classList.contains("snippet")&&val.Snippet)
                    {
                        let lb = document.createElement("br")
                        child.classList.add("show")
                        // console.log(child)
                        val.Snippet.map(val=>{
                            child.append(val)
                            child.appendChild(lb)
                        })
                    }
                    if(val.hasOwnProperty("Snippet"))
                    {
                        
                    }
                    options.map(option=>{
                        if(option.classList.contains("option1"))
                        {
                            option.append(val.Option[0])
                        }
                        if(option.classList.contains("option2"))
                        {
                            option.append(val.Option[1])
                        }
                        if(option.classList.contains("option3"))
                        {
                            option.append(val.Option[2])
                        }
                        if(option.classList.contains("option4"))
                        {
                            option.append(val.Option[3])
                        }
                        let show=[...option.children]
                        if(show[0])
                        {
                            show[0].append(val.Answer)
                        }
                        if(show[1])
                        {
                            show[1].append(val.Explanation)
                        }
                        // console.log(show[1])
                        // show[0].append(val.ans)
                        // show[1].append(val.explainee)
                        // if(show.classList.contains("ans"))
                        // {
                        //     // show.append(val)
                        // }
                    })
                    
                
                })
                cardcontainer.append(cardh)

            })

        })
        let buttons=[...document.getElementsByClassName("showbtn")]
        console.log(buttons)
        

</script>