package main

import (
	"fmt"
	"reflect"
)

func main() {
	var num float64 = 1.2345

	pointer := reflect.ValueOf(&num)
	value := reflect.ValueOf(num)

	// 可以理解为“强制转换”，但是需要注意的时候，转换的时候，如果转换的类型不完全符合，则直接panic
	// Golang 对类型要求非常严格，类型一定要完全符合
	// 如下两个，一个是*float64，一个是float64，如果弄混，则会panic
	convertPointer := pointer.Interface().(*float64)
	convertValue := value.Interface().(float64)

	fmt.Println(*convertPointer)
	fmt.Println(convertValue)
}

//作者：吴德宝AllenWu
//链接：https://juejin.im/post/5a75a4fb5188257a82110544
//来源：掘金
//著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。