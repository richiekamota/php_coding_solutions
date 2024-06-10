# Laravel Assessment
The code contained within this package is broken, contains syntax errors and 
considered unoptimized and poorest of quality with no documentation, 
no structure and no PSRs nor any other standards in place.

Rewrite this package in such a way that the code is:

- Error free
- Structured
- Namespaced
- Methods are type-hinted
- Methods contain return types
- Follows basic formatting PSRs
- Documented
- Able to add more payment methods without having to modifying low-level code
 
The output result format be as follows after hitting the /doPayment endpoint with a POST request:

```json
{
    "status": "<paid or unpaid>",
    "input": [...] 
}
```

## Notes

- A composer  file has been pre-created with a root namespace predefined
- You may use any Laravel packaged classes
- SOLID is the preferred design pattern, however if you have something better in mind that accomplishes the goal, go 
  for it.
- Tests are a bonus, not required.

If you do not know how to handle a certain instruction, go with what you feel is best. 
Instructions are intentionally vague to review how you handle problems.