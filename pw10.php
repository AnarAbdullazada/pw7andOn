<!DOCTYPE html>
<html>
    <head>
        <style>
            .variants_p
            {
                display: inline-block;
                border: 1px solid black;
            }
            *{
                text-align: center;
            }
        </style>
    </head>
    <body style="background-color:#ffe4c4">
        <script>
        /*data=`[
            {
                "question": "Are the HTML tags and elements the same thing?",
                "variants": ["yes", "no"],
                "answer": "no",
                "Exp":"HTML elements are defined by a starting tag, may contain some content and a closing tag.For example, &lth1&gt Heading 1 &lt/h1&gt is a HTML element but just &lth1&gt is a starting tag and &lt/h1&gt is a closing tag."
            },
            {
                "question": "Can we display a web page inside a web page or Is nesting of webpages possible?",
                "variants": ["yes", "no"],
                "answer": "yes",
                "Exp":"We can display a web page inside another HTML web page. HTML provides a tag &ltiframe&gt using which we can achieve this functionality."
            },
            {
                "question": "Is it possible to change an inline element into a block level element?",
                "variants": ["yes", "no"],
                "answer": "yes",
                "Exp":"It is possible using the “display” property with its value as “block”, to change the inline element into a block-level element."
            },
            {
                "question": "Is the &lt;datalist&gt; tag and &lt;select&gt; tag same?",
                "variants": ["yes", "no"],
                "answer": "no",
                "Exp":"The &lt;datalist&gt; tag and &lt;select&gt; tag are different. In the case of &ltselect&gt tag a user will have to choose from a list of options, whereas &ltdatalist&gt when used along with the &ltinput&gt tag provides a suggestion that the user selects one of the options given or can enter some entirely different value."
            },
            {
                "question": "Is drag and drop possible using HTML5?",
                "variants": ["yes", "no"],
                "answer": "yes",
                "Exp":"In HTML5 we can drag and drop an element. This can be achieved using the drag and drop-related events to be used with the element which we want to drag and drop."
            }
        ]`*/
        $json = file_get_contents('C:\\Users\\User\\Downloads\\output.json');
        $data = json_decode($json);
        console.log($data);
        //data=JSON.parse(data);
        function showTest()
        {
            for (var i = 0; i < data.length; i++) {
                question=document.createElement("p");
                question.innerHTML += data[i]["question"];
                document.body.appendChild(question);

                variant_ans_div=document.createElement("div");
                fieldset=document.createElement("div");
                fieldset.setAttribute("id",i);
                variant_ans_div.setAttribute("class","VAD"+i);

                for(var k=0;k<data[i]["variants"].length;k++)
                {
                    variants=document.createElement("input");
                    variants.setAttribute("type","radio");
                    variants.setAttribute("id",k);
                    variants.setAttribute("class","variants_p");
                    variants.setAttribute("name",i)

                    lebel=document.createElement("lebel");
                    lebel.setAttribute("for",k);

                    variant_ans_div.appendChild(lebel)
                    lebel.innerHTML = data[i]["variants"][k];
                    fieldset.appendChild(variants);
                    variant_ans_div.appendChild(fieldset);
                    document.body.appendChild(variant_ans_div);
                }
                document.body.appendChild(document.createElement("hr"));
            }
            endTest=document.createElement("button");
            endTest.innerText = "End Test, Show Answers";
            endTest.setAttribute("onclick", "showAnswers()");
            document.body.appendChild(endTest);
        }
        function showExplanation(e)
        {
            e.innerHTML = data[parseInt(e.getAttribute("class"))]["Exp"];
        }
        function showAnswers()
        {
            for (var i = 0; i < data.length; i++)
            {
                variant_ans_div=document.querySelector(".VAD"+i);
                answers=document.createElement("p");
                answers.innerHTML += data[i]["answer"];
                variant_ans_div.appendChild(answers);

                explanation=document.createElement("div");
                explanation.setAttribute("class",i);
                variant_ans_div.appendChild(explanation);
                explanation.innerHTML = data[i]["Exp"];
                explanation.setAttribute("onclick","showExplanation(this)");

                radio=variant_ans_div.querySelector("input[type='radio']:checked");

                if (radio!=null) {
                    if ((radio.getAttribute("id")==0)&&(data[i]["answer"]=="yes"))
                    {
                        answers.setAttribute("style","background-color:green;");
                    }
                    if ((radio.getAttribute("id")==1)&&(data[i]["answer"]=="no"))
                    {
                        answers.setAttribute("style","background-color:green;");
                    }
                    if ((radio.getAttribute("id")==0)&&(data[i]["answer"]=="no"))
                    {
                        answers.setAttribute("style","background-color:red;");
                    }
                    if ((radio.getAttribute("id")==1)&&(data[i]["answer"]=="yes"))
                    {
                        answers.setAttribute("style","background-color:red;");
                    }
                }
                else
                {
                    answers.setAttribute("style","background-color:gray;");
                }

            }
            endTest.remove(document.body);
        }
        showTest();
        </script>
    </body>
</html>