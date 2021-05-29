cd `dirname $0`

cd ../vagrant

vagrant up

vagrant ssh -c "cd workspace/keisan-mondai-san && sudo make up && sudo su"
