# pitahaya
just a simple framework, I'm actually building for fun.

The idea is really simple 
you make an http Request (GET.POST, DELETE, PUT, PATCH), this request is analyse by a route and 
it will be dispatch to the correct controller, and method.
Nothing new until now.

My idea, here is to separate the controller action from the execution logic and database query. In that case, 
I'm using Business Logic to implements all the execution logic and treatments. Each business Logic will have access to all  
DAO (Data Access Object) to fullfil its action.

I'm not a real fan of the active directory pattern where the Model implements some methods to request the Database. 
I prefer to use a DAO instead and let the Model as a plain class (empty constructor with getters and setters for each class variables).
In that context, the DAO, is only communication point to reach the Database. Of course, the DAO, will request the database throw a Database 
Manager to get the correct connector according to the config file.

This framework is really simple to use, and really interesting to build because it reminds me some good pratice from my previous experiences.

(Notice: I'm still working on it)




