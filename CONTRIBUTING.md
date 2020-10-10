# Contribution Guide
Feel absolutely free to contribute to this project via issues report, pull requests and our wikis. Our community forum is also a great place to show your views, desires and expectations of and for the project.--------------------


As a developer, you can greatly help influence how our service operates by working with our source code. Because the project is closed source, if you wish to be one of developers then simply write an email to _jonathanirhodia[at]gmail.com_ with the subject: 'MacBB Developer Application'.


After access is granted you only need to clone the project using the command `git clone https://github.com/elcharitas/pucks.git` To get started. Now you only need to follow the steps outlined below depending on which part of the project you wish to contribute to.

* Frontend: `design`
* Backend: `core`

*N/B*: Content Contribution is welcomed on [our wikis]() 

## Frontend: Themes and UI
After cloning the master branch, simply checkout the `design` branch using the command `git checkout design`. After checking out the branch, make a duplicate branch of it using the following pattern `<name>-branch` and then check out your new branch. Your new branch is where all changes you want to make goes. _*Do not push to the `design` branch*_
All in one, you should run commands which should look like this
```shell
git clone https://github.com/elcharitas/pucks.git
git checkout design
git branch <name>-branch
git checkout <name>-branch
```

## Backend: Application Core
After cloning the core branch, make a duplicate branch of it using the following pattern `<name>-branch` and then check out your new branch. Your new branch is where all changes you want to make goes. *Do not push to the `core` .branch*
All in one, you should run commands which should look like this

```shell
git clone -b core https://github.com/elcharitas/pucks.git
cd pucks
git branch <name>-branch
git checkout <name>-branch
```


*Setting Up Backend*

After cloning run the following commamd to install dependencies
```shell
composer install
```
Now after all the dependencies have been installed, using an editor like `vim` or `nano` or an external editor like *VS Code* open up your newly generated .env file and look up the following configurations:
```env
AUTO_AUTH=true ;Set to true to automatically log in
```