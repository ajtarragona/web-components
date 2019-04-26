#! /bin/bash

git add .

msg="no message set"
echo "$#"
if [ "$#" -gt 0 ]; then
	msg=$1
fi


git commit -am "$msg"

current=`git describe --tags --abbrev=0`
newversion="1.0.0"

if [ -f ".version" ]; then
	newversion="`cat .version`"
fi


if [ "$newversion" != "$current" ]; then
     git tag -a "$newversion" -m "`git log -1 --format=%s`"
     echo "Created a new tag, $newversion"
fi

git push && git push --tags