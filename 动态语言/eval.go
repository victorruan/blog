package main

func main(){

}

func calculator(op string ,n1 int,n2 int ) int{
	switch op {
	case "*":
		return n1 * n2;
	case "+":
		return n2 + n1;
	}
	return 0
}
