package main

import "reflect"

func main(){

	s := struct {
		Age int `json:"age" vruan:"nb"`
		Name string `json:"name"`
	}{19,"lis"}

	stype := reflect.TypeOf(s)
	jsonTag := stype.Field(0).Tag.Get("vruan")
	println(jsonTag)
}
