## PHP PRACTICE WITH MVC

A simple mvc crud for registration of products, with login.
Simple, here I'm just tryna remember things to not get fired
and also to know how to implement routers without frameworks.

## Its important to remark, things as validations, front end validations, alerts and shit are not included here since, I just want to remember how it is to code in vanilla php, no more, so I dont get fired

-Login page, fucking simple
![image](https://user-images.githubusercontent.com/78714792/210281351-215c44f4-159b-4cd7-9789-f7920ae122d6.png)

-Table page (pagination's missing because I'm fucking lazy, but I learned that, in order to get pagination you dont need front end frameworks
that makes you donwload almost all the table's data, you just need to do a limit in sql, then pass in php the parameter page and limit, calculate the offset, execute the query to get number of rows, get the data with limit, make a math calculation to put rows per page and return a json with 4 parameters)
![image](https://user-images.githubusercontent.com/78714792/210281455-cff25f20-f972-4cc7-853a-7d5a08d1fbfa.png)

-Add new product (no validations, nothing)
![image](https://user-images.githubusercontent.com/78714792/210281475-197796e2-8ad7-49e4-9897-66525d1bbfde.png)

-edit (no validations also)
![image](https://user-images.githubusercontent.com/78714792/210281503-95085a12-435e-44e5-8690-36d00eb207f1.png)
