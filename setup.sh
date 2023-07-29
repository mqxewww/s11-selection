ERROR_COLOR="\033[0;31m"
INFO_COLOR="\033[0;34m"
NO_COLOR="\033[0m"
SUCCESS_COLOR="\033[0;32m"

printf "${INFO_COLOR}Configuration of s11-selection v1.3.0 :${NO_COLOR}\n"
printf "${INFO_COLOR}🛈 Fetching...${NO_COLOR}\n"

source <(curl -s https://files.mqxewww.dev/get-choice.sh)

if [[ ! $(type -t getChoice) == function ]] ; then
  printf "${ERROR_COLOR}✖ Fetch failed. Try again later.${NO_COLOR}\n"
  exit 1
fi

installMethods=(
  "Complete installation with Docker. (Docker must be already installed)"
  "Partial installation (only environment variables)"
)

getChoice -q "Choose an installation method." -o installMethods -i 1 -m 2 -v "installChoice"
printf "\nChoose an installation method. ${INFO_COLOR}${installChoice}\n"

if [ "$installChoice" == "${installMethods[0]}" ] ; then
  read -p $'\e[1;30m> [1/4]\e[0m Enter your MySQL server link. \e[1;30m(No backslash at the end. Default: localhost)\e[0m : ' host_prompt
  if [ -z "$host_prompt" ] ; then
    host_prompt="localhost"
  fi

  read -p $'\e[1;30m> [2/4]\e[0m Enter your database name. \e[1;30m(Default: selection)\e[0m : ' db_name_prompt
  if [ -z "$db_name_prompt" ] ; then
    db_name_prompt="selection"
  fi

  read -p $'\e[1;30m> [3/4]\e[0m Enter the mysql user name. \e[1;30m(Default: root)\e[0m : ' mysql_name_prompt
  if [ -z "$mysql_name_prompt" ] ; then
    mysql_name_prompt="root"
  fi

  read -p $'\e[1;30m> [4/4]\e[0m Enter the mysql user password. \e[1;30m(Default is empty)\e[0m : ' mysql_pwd_prompt

  rm -f .env

  printf "PATH_TO_INDEX=/" >> .env
  printf "\nDB_HOST=${host_prompt}" >> .env
  printf "\nDB_NAME=${db_name_prompt}" >> .env
  printf "\nDB_USER=${mysql_name_prompt}" >> .env
  printf "\nDB_PWD=${mysql_pwd_prompt}" >> .env

  printf "\n${INFO_COLOR}🛈 Creating the Docker image...${NO_COLOR}\n"

  {
    docker build -t mqxewww/s11-selection:1.3.0 .
  } || {
    printf "\n${ERROR_COLOR}✖ Docker image creation failed.${NO_COLOR}\n"
    printf "\n${ERROR_COLOR}✖ Try to run docker build -t mqxewww/s11-selection:1.3.0 . later.${NO_COLOR}\n"
    exit 1
  }

  printf "\n${SUCCESS_COLOR}✓ Docker image succesfully created.${NO_COLOR}\n"
  printf "${INFO_COLOR}🛈 Run your container with docker run -p 80:80 --env-file .env mqxewww/s11-selection:1.3.0\n"
  printf "${SUCCESS_COLOR}✓ s11-selection v1.3.0 configuration complete.${NO_COLOR}\n"

elif [ "$installChoice" == "${installMethods[1]}" ] ; then
  printf "\n${INFO_COLOR}🛈 Copy the .template.env file and rename it .env."
  printf "\n${INFO_COLOR}🛈 Then replace the variables with your owns. The application is then ready to use."
fi